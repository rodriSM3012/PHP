<?php
function comoHaceElAnimal($animal, $animalesSonando)
{
    if (array_key_exists($animal, $animalesSonando)) {
        return "El $animal hace $animalesSonando[$animal].";
    } else {
        return "No sé cómo hace el $animal";
    }
}
