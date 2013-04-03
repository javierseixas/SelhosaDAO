<?php

namespace Selhosa\RepairBundle\Entity;

use Selhosa\WorkBundle\Entity\WorkOrder;
use Doctrine\Common\Collections\ArrayCollection;
use Selhosa\RepairBundle\Entity\Charges;

/**
 * WorkOrder
 */
class Repair extends WorkOrder
{
    /**
     * @var integer
     */
    private  $id;

    /**
     * @var \Selhosa\ElectronicBundle\Entity\Electronic
     */
    private $electronic;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $charges;

    // TODO Pulir que Repair tenga categories, que no pega mucho porque no tiene relación en la otra entidad
    private $categories;

    // TODO Estudiar si se puede evitar esto, ya que no existe relación en la base de datos
    // Se utiliza para el imputar materiales desde el flujo de trabajo por modal
    private $materials;


    public function __construct()
    {
        $this->charges = new ArrayCollection();
        $this->materials = new ArrayCollection();

        parent::__construct();
    }

    /**
     * @param \Selhosa\ElectronicBundle\Entity\Electronic $electronic
     */
    public function setElectronic($electronic)
    {
        $this->electronic = $electronic;

        return $this;
    }

    /**
     * @return \Selhosa\ElectronicBundle\Entity\Electronic
     */
    public function getElectronic()
    {
        return $this->electronic;
    }

    public function getElectronicCategories()
    {
        return $this->categories;
    }

    public function setElectronicCategories($categories)
    {
        $this->categories = $categories;
    }


    /**
     * Add charges
     *
     * @param \Selhosa\RepairBundle\Entity\Charges $charges
     * @return Charges
     */
    public function addCharge(Charges $charge)
    {
        if (!$this->charges->contains($charge)) {
            $this->charges->add($charge);
        }

        return $this;
    }

    /**
     * Remove charges
     *
     * @param \Selhosa\RepairBundle\Entity\Charges $charge
     */
    public function removeCharge(Charges $charge)
    {
        $this->charges->removeElement($charge);
    }

    /**
     * Get charges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $charges
     */
    public function setCharges(ArrayCollection $charges)
    {
        $this->charges = $charges;
    }

    /**
     * Get material charges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaterialCharges()
    {
        return array_filter($this->charges->toArray(), function($charge) { if ($charge->getMaterial()) return true;  } );
    }


    /**
     * Add material charges
     *
     * @param \Selhosa\RepairBundle\Entity\Charges $charges
     * @return Charges
     */
    public function setMaterialCharges(array $charges)
    {
        foreach($charges as $charge) {
            $this->addCharge($charge);
        }

        return $this;
    }


    /**
     * Add materials
     *
     * @param \Selhosa\MaterialBundle\Entity\Material $materials
     * @return Material
     */
    public function addMaterial(\Selhosa\MaterialBundle\Entity\Material $material)
    {
        $this->materials[] = $material;

        $charges = new Charges();
        $charges->setMaterial($material);
        $charges->setRepair($this);
        $this->addCharge($charges);

        return $this;
    }

    /**
     * Remove materials
     *
     * @param \Selhosa\MaterialBundle\Entity\Material $materials
     */
    public function removeMaterial(\Selhosa\MaterialBundle\Entity\Material $material)
    {
        $this->materials->removeElement($material);

    }

    /**
     * Get materials
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaterials()
    {
        return $this->materials;
    }

}