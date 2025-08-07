<?php
function extractDocBlocks($file) {
    $content = file_get_contents($file);
    preg_match_all('/\/\*\*(.*?)\*\//s', $content, $matches);
    return $matches[0];
}

function formatDocBlocks($blocks) {
    $formatted = [];
    foreach ($blocks as $block) {
        $lines = explode("\n", trim($block));
        $formattedBlock = "";
        foreach ($lines as $line) {
            $formattedBlock .= trim(str_replace("*", "", $line)) . "\n";
        }
        $formatted[] = trim($formattedBlock);
    }
    return $formatted;
}

$file = "example.php";
$docBlocks = extractDocBlocks($file);
$formatted = formatDocBlocks($docBlocks);

echo "Документация из файла $file:\n";
foreach ($formatted as $block) {
    echo "-----\n$block\n";
}
?>
