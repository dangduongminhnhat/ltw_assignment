    <?php
    function generateStarRating($number) {
        $stars = "";
        $fullStar = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFC700" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>';
        $emptyStar = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#CCCCCC" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>';

        // Calculate the number of full stars
        $fullStars = floor($number);
        // Calculate the number of half stars
        $halfStar = $number - $fullStars >= 0.5 ? 1 : 0;

        // Append full stars
        for ($i = 0; $i < $fullStars; $i++) {
            $stars .= $fullStar;
        }

        // Append half star if needed
        if ($halfStar) {
            $stars .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFC700" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.886l2.447 4.925 5.478.8a.5.5 0 0 1 .279.853l-3.955 3.858.932 5.447a.5.5 0 0 1-.728.527L8 13.132l-4.975 2.616a.5.5 0 0 1-.728-.527l.932-5.447L.796 7.564a.5.5 0 0 1 .28-.853l5.478-.8L8 1.886zm0 0v10.228L5.027 12.25a.5.5 0 0 1 .272-.872l5.451-.795-2.423-4.874a.5.5 0 0 1-.145-.467l.723-4.215L8 1.886z"/>
                    </svg>';
        }

        // Append empty stars
        $emptyStars = 5 - $fullStars - $halfStar;
        for ($i = 0; $i < $emptyStars; $i++) {
            $stars .= $emptyStar;
        }

        return $stars;
    }
    ?>

    <!-- Usage example: -->

