package packageName;

import java.util.List;

import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class MyController {

    @Autowired
    public String serviceX;

    @Autowired
    public String serviceXs;

    @Autowired
    public String serviceXsq;

    @Autowired
    public String serviceXxx;

    @GetMapping("/setPath/helloworld/{pathVariableName}")
    public String getHelloWorld(@PathVariable("pathVariableName") String param) {
        return "Example";
    }

}