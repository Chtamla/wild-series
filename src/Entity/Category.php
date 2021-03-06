<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Program", mappedBy="category")
     */
    private $programs;
    public function __construct()
    {
        $this->programs=new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    public function getPrograms(): ArrayCollection
    {
        return $this->programs;
    }
    /**
     * @param Program $program
     * @return Category
     */
    public function addProgram(Program $program):self
    {
        if($this->programs->contains($program))
        {
            $this->programs[]=$program;
            $program->setCategory($this);
        }
        return $this;
    }
    /**
     * Undocumented function
     *
     * @param Program $program
     * @return Category
     */
    public function removeProgram(Program $program):self
    {
        if($this->programs->contains($program))
        {
            $this->programs->removeElement($program);
            //set the owning side null (unless)already changed
            if($program->getCategory()===$this)
            {
                $program->setCategory(null);
            }
            return $this;
        }
    }
}