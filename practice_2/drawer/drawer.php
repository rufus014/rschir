<?php 
    function circle(){
    return '<div>
                <svg height="100" width="100">
                    <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red"/>
                </svg>  
            </div>';
    }

    function star(){
    return '<div>   
                <svg height="210" width="200">
                    <polygon points="100,10 40,198 190,78 10,78 160,198"
                    style="fill:black; fill-rule:nonzero;" />
                </svg>
            </div>';
    }
?>