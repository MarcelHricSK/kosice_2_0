<?php

namespace App\Helpers;

class PolygonHelper
{
    public $pointOnVertex = true; // Check if the point sits exactly on one of the vertices?

    public static function pointInPolygon($x, $y, $polygon, $pointOnVertex = true)
    {

        // Transform string coordinates into arrays with x and y values
        $point = [$x, $y];
        $vertices = array();
        foreach ($polygon as $vertex) {
            $vertices[] = [$vertex[0], $vertex[1]];
        }

        // Check if the point sits exactly on a vertex
        if ($pointOnVertex and static::pointOnVertex($point, $vertices)) {
            return true;
        }

        // Check if the point is inside the polygon or on the boundary
        $intersections = 0;
        $vertices_count = count($vertices);

        for ($i = 1; $i < $vertices_count; $i++) {
            $vertex1 = $vertices[$i - 1];
            $vertex2 = $vertices[$i];
            if ($vertex1[1] == $vertex2[1] and $vertex1[1] == $point[1] and $point[0] > min($vertex1[0], $vertex2[0]) and $point[0] < max($vertex1[0], $vertex2[0])) { // Check if point is on an horizontal polygon boundary
                return true;
            }
            if ($point[1] > min($vertex1[1], $vertex2[1]) and $point[1] <= max($vertex1[1], $vertex2[1]) and $point[0] <= max($vertex1[0], $vertex2[0]) and $vertex1[0] != $vertex2[1]) {
                $xinters = ($point[1] - $vertex1[1]) * ($vertex2[0] - $vertex1[0]) / ($vertex2[1] - $vertex1[1]) + $vertex1[0];
                if ($xinters == $point[0]) { // Check if point is on the polygon boundary (other than horizontal)
                    return true;
                }
                if ($vertex1[0] == $vertex2[0] || $point[0] <= $xinters) {
                    $intersections++;
                }
            }
        }
        // If the number of edges we passed through is odd, then it's in the polygon.
        if ($intersections % 2 != 0) {
            return true;
        }
        return false;
    }

    public static function pointOnVertex($point, $vertices)
    {
        foreach ($vertices as $vertex) {
            if ($point == $vertex) {
                return true;
            }
        }
    }
}
