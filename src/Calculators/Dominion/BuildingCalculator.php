<?php

namespace OpenDominion\Calculators\Dominion;

use OpenDominion\Helpers\BuildingHelper;
use OpenDominion\Models\Dominion;

class BuildingCalculator extends AbstractDominionCalculator
{
    /** @var BuildingHelper */
    protected $buildingHelper;

    public function __construct(Dominion $dominion)
    {
        parent::__construct($dominion);

        $this->buildingHelper = app()->make(BuildingHelper::class);
    }

    /**
     * Returns the Dominion' total number of buildings.
     *
     * @return int
     */
    public function getTotalBuildings()
    {
        $totalBuildings = 0;

        foreach ($this->buildingHelper->getBuildingTypes() as $buildingType) {
            $totalBuildings += $this->dominion->{'building_' . $buildingType};
        }

        return $totalBuildings;
    }
}
