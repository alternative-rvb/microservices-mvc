<?php 

class Utils
{
    public function sanitizeInput($data)
    {
        $data = $data ?? "";
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
