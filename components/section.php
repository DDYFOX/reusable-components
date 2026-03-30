<?php
    include 'array_to_rgba.php';

    # A function to create a main section with a specified element ID, text, content, background image, background tint,
    # and inner content alignment (0 = left, 1 = center, 2 = right)
    function mainSection(string $id, string $title, string $content, string $bgImage, array $bgImageTint, int $alignment = 0): string {
        # Escaped outputs    
        $titleOutput = htmlspecialchars($title);
        $contentOutput = htmlspecialchars($content);
        $bgImageOutput = htmlspecialchars($bgImage);
        $idOutput = htmlspecialchars($id);

        # Dynamic outputs
        $alignmentClass = match ($alignment) {
            default => "left-contents",
            0 => "left-contents",
            1 => "center-contents",
            2 => "right-contents"
        };
        $classList = "main-section $alignmentClass";
        $color = makeRGBA($bgImageTint);

        # HTML content
        $html = <<< HTML
            <div class="$classList" style="
                background: linear-gradient($color, $color),
                url('$bgImageOutput');
                background-size: cover;
                background-position: center;">
                <div class="content-section">
                    <h1 id="{$idOutput}-title">$titleOutput</h1>
                    <p id="{$idOutput}-text">$contentOutput</p>
                </div>
            </div>
        HTML;

        return $html;
    }
?>
