<?php
function render_template(string $template, array $data = [])
{
    extract($data);
    require_once("templates/$template.php");
}
