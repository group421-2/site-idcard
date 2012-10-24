<?php

//TODO: дописать в создании вьюшки прописывание пути к контроллеру
function create($do, $what, $name, $moduleName = NULL) {
    if ($do == "create") {
        switch ($what) {
            case "module":
                mkdir("app/modules/$name");
                mkdir("app/modules/$name/controller");
                mkdir("app/modules/$name/model");
                mkdir("views/$name");
                mkdir("views/add/js/$name");
                mkdir("views/add/css/$name");
                touch("app/modules/$name/controller/index.php");
                touch("app/modules/$name/model/index.php");
                touch("views/$name/index.php");
                touch("views/add/js/$name/index.js");
                touch("views/add/css/$name/index.css");
                $file = fopen("app/modules/$name/controller/index.php", "w+");
                fwrite($file, "
                <?php \n 
                \n\n\n 
                class " . $name . "_Controller {
                    \n public function __construct(\$params) { 
                        \$this->init(\$params)->execute(); 
                        \n\n} \n
                        private function init(\$params) { 
                            return \$this;\n\n}\n\n 
                            private function execute() {
                                \n\n\n} \n\n
                            }
                            ?>");
                fclose($file);
                $file = fopen("app/modules/$name/model/index.php", "w+");
                fwrite($file, "
                <?php 
                class " . $name . "_Model {
                    \n\n
                    
                }?>");
                fclose($file);
                $file = fopen("views/$name/index.php", "w+");
                fwrite($file, "<script src=\"views/js/add/$name/index.js\"></script>
                <link rel=\"stylesheet\" type=\"text/css\" href=\"/views/add/css/$name/index.css\"></link>
                <h1>Вы успешно создали модуль</h1>");
                fclose($file);
                print "Module $name created";
                break;
            case "controller":
                if ($moduleName == "" || !$moduleName)
                    exit("All what we need is sex.");
                touch("app/modules/$moduleName/controller/$name.php");
                $file = fopen("app/modules/$moduleName/controller/$name.php", "w+");
                fwrite($file, "
                <?php \n 
                \n\n\n 
                class " . $moduleName . "_" . $name . "_Controller {
                    public function __construct(array \$params) { 
                        \$this->init(array \$params)->execute(); 
                    } \n
                    private function init(\$params) { 
                        return \$this;\n\n
                    }\n\n 
                    private function execute() { 
                        
                    } \n\n
                }
                ?>");
                fclose($file);
                print "Controller $name in $moduleName created";
                break;
            case "model":
                if ($moduleName == "" || !$moduleName)
                    exit("All what we need is sex.");
                touch("app/modules/$moduleName/model/$name.php");
                $file = fopen("app/modules/$moduleName/model/$name.php", "w+");
                fwrite($file, "<?php 
                class " . $moduleName . "_" . $name . "_Model {
                    \n\n
                }
                ?>");
                fclose($file);
                print "Model $name in $moduleName created";
                break;
            case "view":
                if ($moduleName == "" || !$moduleName)
                    exit("All what we need is sex.");
                touch("views/$moduleName/$name.php");
                touch("views/add/js/$moduleName/$name.js");
                touch("views/add/css/$moduleName/$name.css");
                $file = fopen("views/$moduleName/$name.php", "w+");
                fwrite($file, "<script src=\"views/add/js/$moduleName/$name.js\"></script>
                <link rel=\"stylesheet\" type=\"text/css\" href=\"/views/add/css/$moduleName/$name.css\"></link>
                <h1>Вы успешно создали вид</h1>\n
                require_once \$_SERVER['DOCUMENT_ROOT'].'/app/core/import.class.php';\n
                new import(\"controller." . $moduleName . ".$name\")");
                fclose($file);
                print "View $name in $moduleName created";
                break;
        }
    }
}

if ($argc < 4) {
    exit("Not enought parameters. For example: \n
        php fp.php create controller test <module name>");
} else {
    create($argv[1], $argv[2], $argv[3], $argv[4]);
}
?>
