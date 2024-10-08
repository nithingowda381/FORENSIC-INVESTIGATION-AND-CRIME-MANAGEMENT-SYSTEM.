<?php

class compareImages
{
    private function mimeType($i)
    {
        /*returns array with mime type and if its jpg or png. Returns false if it isn't jpg or png*/
        $mime = getimagesize($i);
        $return = array($mime[0], $mime[1]);

        switch ($mime['mime']) {
            case 'image/jpeg':
                $return[] = 'jpg';
                return $return;
            case 'image/png':
                $return[] = 'png';
                return $return;
            default:
                return false;
        }
    }

    private function createImage($i)
    {
        /*returns image resource or false if its not jpg or png*/
        $mime = $this->mimeType($i);

        if ($mime[2] == 'jpg') {
            return imagecreatefromjpeg($i);
        } elseif ($mime[2] == 'png') {
            return imagecreatefrompng($i);
        } else {
            return false;
        }
    }

    private function resizeImage($source)
    {
        /*resizes the image to an 8x8 square and returns as image resource*/
        $mime = $this->mimeType($source);
        $t = imagecreatetruecolor(8, 8);

        $sourceImage = $this->createImage($source);

        if (!$sourceImage) {
            return false;
        }

        imagecopyresized($t, $sourceImage, 0, 0, 0, 0, 8, 8, $mime[0], $mime[1]);
        imagedestroy($sourceImage);

        return $t;
    }

    private function colorMeanValue($i)
    {
        /*returns the mean value of the colors and the list of all pixel's colors*/
        $colorList = array();
        $colorSum = 0;

        for ($a = 0; $a < 8; $a++) {
            for ($b = 0; $b < 8; $b++) {
                $rgb = imagecolorat($i, $a, $b);
                $colorList[] = $rgb & 0xFF;
                $colorSum += $rgb & 0xFF;
            }
        }

        return array($colorSum / 64, $colorList);
    }

    private function bits($colorMean)
    {
        /*returns an array with 1 and zeros. If a color is bigger than the mean value of colors it is 1*/
        $bits = array();
        foreach ($colorMean[1] as $color) {
            $bits[] = ($color >= $colorMean[0]) ? 1 : 0;
        }
        return $bits;
    }

    public function compare($a, $b)
    {
        /*main function. returns the Hamming distance of two images' bit value*/
        $i1 = $this->resizeImage($a);
        $i2 = $this->resizeImage($b);

        if (!$i1 || !$i2) {
            return false;
        }

        imagefilter($i1, IMG_FILTER_GRAYSCALE);
        imagefilter($i2, IMG_FILTER_GRAYSCALE);

        $colorMean1 = $this->colorMeanValue($i1);
        $colorMean2 = $this->colorMeanValue($i2);

        $bits1 = $this->bits($colorMean1);
        $bits2 = $this->bits($colorMean2);

        $hammingDistance = 0;

        for ($a = 0; $a < 64; $a++) {
            if ($bits1[$a] != $bits2[$a]) {
                $hammingDistance++;
            }
        }

        imagedestroy($i1);
        imagedestroy($i2);

        return $hammingDistance;
    }
}

?>
