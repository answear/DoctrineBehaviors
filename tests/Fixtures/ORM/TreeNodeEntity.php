<?php

declare(strict_types=1);

namespace Knp\DoctrineBehaviors\Tests\Fixtures\ORM;

use ArrayAccess;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Tree\Node;
use Knp\DoctrineBehaviors\Model\Tree\NodeInterface;

/**
 * @ORM\Entity(repositoryClass="Knp\DoctrineBehaviors\Tests\Fixtures\ORM\TreeNodeEntityRepository")
 */
class TreeNodeEntity implements NodeInterface, ArrayAccess
{
    use Node;

    /**
     * @var string
     */
    public const PATH_SEPARATOR = '/';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;

    public function __construct($id = null)
    {
        $this->childNodes = new ArrayCollection();
        $this->id = $id;
    }

    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}