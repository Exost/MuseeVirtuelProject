<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 01/12/2015
 * Time: 22:10
 */

$messageErreur='';
require ("{$ROOT}{$DS}model{$DS}modelMembre.php");
require ("{$ROOT}{$DS}model{$DS}modelDocument.php");

                $layout='Visiteur';
            }
            $document = modelDocument::select($_GET['idDocument']);
            if(!empty($document)){
                $pagetitle = $document->getIdDocument();
                $view = ucfirst($document->getType());

            }else{
                $view="Error";
                $pagetitle='oeuvre inexistante';
            }


        }

        break;
}require("{$ROOT}{$DS}view{$DS}view$layout.php");

?>