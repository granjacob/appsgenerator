
<?php 
class GenClass {
    public function  __construct()
    {

    }

    public function validateData()
    {
        foreach ($this as $key => $value) {
            if ($value === null) {
                throw new Exception( "Some data required for generate the source code is not present." );
            }
        }
    }
}

class SpringBootController extends GenClass
{
    protected $packageName;

    protected $controllerClassName;

    protected $Services;

    protected $Methods;

    protected $Repositories;

    protected $OtherThings;

    protected $MoreThings;

    protected $AndMoreThings;

    protected $WithMoreThings;

    public function __construct()
    {
        parent :: __construct();

        $this->packageName = "PackageHelloWorld";

        $this->controllerClassName = "MyClass";

        $this->Services = array('a','n');

        $this->Methods = array('a','n');

        $this->Repositories = array('a','n');

        $this->OtherThings = array('a','n');

        $this->MoreThings = array('a','n');

        $this->AndMoreThings = array('a','n');

    }

    public function write()
    {
        $this->validateData();
        print "package {$this->packageName};\n";
        print "\n";
        print "import java.util.List;\n";
        print "\n";
        print "import org.springframework.web.bind.annotation.DeleteMapping;\n";
        print "import org.springframework.web.bind.annotation.GetMapping;\n";
        print "import org.springframework.web.bind.annotation.PathVariable;\n";
        print "import org.springframework.web.bind.annotation.PostMapping;\n";
        print "import org.springframework.web.bind.annotation.PutMapping;\n";
        print "import org.springframework.web.bind.annotation.RequestBody;\n";
        print "import org.springframework.web.bind.annotation.RestController;\n";
        print "\n";
        print "@RestController\n";
        print "public class {$this->controllerClassName} {\n";
        print "\n";
        print "    \n";
        if (is_array($this->Services)) {
            foreach ($this->Services as $item_Services) {
                $item_Services->write();
            }
        }

        print "\n";
        print "\n";
        print "    \n";
        if (is_array($this->Methods)) {
            foreach ($this->Methods as $item_Methods) {
                $item_Methods->write();
            }
        }

        print "\n";
        print "\n";
        print "    \n";
        if (is_array($this->Repositories) && count($this->Repositories) > 0) {
            print "\n";
            if (is_array($this->Repositories)) {
                foreach ($this->Repositories as $item_Repositories) {
                    $item_Repositories->write();
                }
            }
        }

        print "\n";
        print "\n";
        print "    \n";
        if (is_array($this->OtherThings) && count($this->OtherThings) > 0) {
            print "\n";
            if (is_array($this->OtherThings)) {
                foreach ($this->OtherThings as $item_OtherThings) {
                    $item_OtherThings->write();
                }
            }
        }

        print "\n";
        print "\n";
        print "    \n";
        if (
            is_array($this->MoreThings) &&
            count($this->MoreThings) > 0 &&
            (is_array($this->AndMoreThings) && count($this->AndMoreThings) > 0)
        ) {
            print "\n";
            if (is_array($this->MoreThings)) {
                foreach ($this->MoreThings as $item_MoreThings) {
                    $item_MoreThings->write();
                }
            }

            print " and \n";
            if (is_array($this->AndMoreThings)) {
                foreach ($this->AndMoreThings as $item_AndMoreThings) {
                    $item_AndMoreThings->write();
                }
            }

            print " \n";
            print "            \n";
            if (
                is_array($this->WithMoreThings) &&
                count($this->WithMoreThings) > 0
            ) {
                print "\n";
                if (is_array($this->WithMoreThings)) {
                    foreach ($this->WithMoreThings as $item_WithMoreThings) {
                        $item_WithMoreThings->write();
                    }
                }
            }
        }
    }
}


$springController = new SpringBootController();




$springController->write();

?>
