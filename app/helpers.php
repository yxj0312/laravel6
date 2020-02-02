<?php

namespace App;

// // Helper function
    function flash($message) {
        session()->flash('message', $message);
    }
// class helpers
// {
//     // Helper function
//     function flash($message) {
//         session()->flash('message', $message);
//     }
// }

