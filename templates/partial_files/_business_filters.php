<?php
    use Backend\Database\Tables\BusinessTypes;

    function createBusinessTypeListItem($id, $name, $icon) {
        echo "<li data-id='{$id}' data-name='{$name}' data-type-icon='{$icon}'>
                <a href=\"#\">
                    <span class=\"{$icon} margin-iconic\"></span>{$name}
                </a>
            </li>";
    }

    $table        = new BusinessTypes();
    $businessData = $table->readAll();
    createBusinessTypeListItem(0, 'All', 'entypo-plus-circled');
    for ($i = 0; $i < count($businessData); $i++) {
        $c = $businessData[$i];
        createBusinessTypeListItem($c->getId(), $c->getName(), $c->getIcon());
    }
?>