<?php

class PostController implements Controller
{
    public function action()
    {
        if ($this->notfound())
        {
            foreach ($_POST as $_key => $_value)
            {
                switch ($_key)
                {
                    case 'test':
                        echo 'you right bro';
                        break;
                }
            }
        }
    }

    public function notfound()
    {
        $_key = 0;

        foreach ($_POST as $_key => $_value)
        {
            $_key++;
        }

        return ($_key > 0);
    }
}
?>
