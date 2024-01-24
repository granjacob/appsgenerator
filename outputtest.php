<?php

class SpringBootController
{

    public $packageName;

    public $controllerClassName;

    public $Services;

    public $Methods;

    public $Repositories;

    public $OtherThings;

    public $MoreThings;

    public $AndMoreThings;

    public $WithMoreThings;

    public function write()
    {

        print 'package ';

        print $this->packageName;

        print ';';
        print '';
        print 'import java.util.List;';
        print '';
        print 'import org.springframework.web.bind.annotation.DeleteMapping;';
        print 'import org.springframework.web.bind.annotation.GetMapping;';
        print 'import org.springframework.web.bind.annotation.PathVariable;';
        print 'import org.springframework.web.bind.annotation.PostMapping;';
        print 'import org.springframework.web.bind.annotation.PutMapping;';
        print 'import org.springframework.web.bind.annotation.RequestBody;';
        print 'import org.springframework.web.bind.annotation.RestController;';
        print '';
        print '@RestController';
        print 'public class ';

        print $this->controllerClassName;

        print ' {';
        print '';
        print '    ';

        foreach ($this->Services as $item_Services)
        {
            $item_Services->write();
        }

        print '';
        print '';
        print '    ';

        foreach ($this->Methods as $item_Methods)
        {
            $item_Methods->write();
        }

        print '';
        print '';
        print '    ';

        if (count($this->Repositories) > 0)
        {

            foreach ($this->Repositories as $item_Repositories)
            {
                $item_Repositories->write();
            }

        }

        print '';
        print '';
        print '    ';

        if (count($this->OtherThings) > 0)
        {

            foreach ($this->OtherThings as $item_OtherThings)
            {
                $item_OtherThings->write();
            }

        }

        print '';
        print '';
        print '    ';

        if (count($this->MoreThings) > 0 && count($this->AndMoreThings) > 0)
        {

            foreach ($this->MoreThings as $item_MoreThings)
            {
                $item_MoreThings->write();
            }

            print ' and ';

            foreach ($this->AndMoreThings as $item_AndMoreThings)
            {
                $item_AndMoreThings->write();
            }

            print ' ';
            print '            ';

            if (count($this->WithMoreThings) > 0)
            {

                foreach ($this->WithMoreThings as $item_WithMoreThings)
                {
                    $item_WithMoreThings->write();
                }

            }

        }

        print '';
        print '}';

    }

}

?>
