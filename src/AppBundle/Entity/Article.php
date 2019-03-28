<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     *
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     *
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "You must enter an amount superior to {{ limit }}",
     * )
     * @Assert\NotNull()
     */
    private $amountHT;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $creation;

    /**
     * @var Rate
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rate", inversedBy="articles")
     */
    private $rate;

    public function __construct()
    {
        $this->creation = new DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Article
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Article
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountHT(): ?float
    {
        return $this->amountHT;
    }

    /**
     * @param float $amountHT
     * @return Article
     */
    public function setAmountHT(float $amountHT): self
    {
        $this->amountHT = $amountHT;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreation(): DateTime
    {
        return $this->creation;
    }

    /**
     * @param DateTime $creation
     * @return Article
     */
    public function setCreation(DateTime $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    /**
     * @return Rate
     */
    public function getRate(): ?Rate
    {
        return $this->rate;
    }

    /**
     * @param Rate $rate
     * @return Article
     */
    public function setRate(Rate $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
}
