<?php
    //source d'inspiration https://jcrozier.developpez.com/articles/web/panier/
    function creation_panier()
    {
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier']=array();
            $_SESSION['panier']['id']=array();
            $_SESSION['panier']['name']=array();
            $_SESSION['panier']['photo']=array();
            $_SESSION['panier']['description']=array();
            $_SESSION['panier']['quantity'] = array();
            $_SESSION['panier']['price'] = array();
            $_SESSION['panier']['lock'] = false;
        }
        return true;
    }

    function isLocked()
    {
        if(isset($_SESSION['panier']))
            return $_SESSION['panier']['lock'];
        else
            return false;
    }

    function add($id,$price,$photo,$description,$name)
    {
        if(creation_panier() and !isLocked())
        {
            //si il existe deja on ajoute juste la quantite
            $position = array_search($id,$_SESSION['panier']['id']);
            if($position !== false)
            {
                $_SESSION['panier']['quantity'][$position] += 1 ;
            }
            else
            {
                //sinon on ajoute le produit
                    array_push( $_SESSION['panier']['id'],$id);
                    array_push( $_SESSION['panier']['price'],$price);
                    array_push( $_SESSION['panier']['quantity'],1);
                    array_push( $_SESSION['panier']['photo'],$photo);
                    array_push( $_SESSION['panier']['description'],$description);
                    array_push( $_SESSION['panier']['name'],$name);
                }
            }
    }


    function delete($id)
    {
        if(creation_panier() and !isLocked())
        {
            //panier temporaire pour eviter de créer des valeurs NULL dans le panier
            $tmp=array();
            $tmp['quantity'] = array();
            $tmp['price'] = array();
            $tmp['id'] = array();
            $tmp['name'] = array();
            $tmp['photo'] = array();
            $tmp['description'] = array();

            for($i = 0; $i < count($_SESSION['panier']['id']); $i++)
            {
                //on le remplit par le panier en n'ajoutant pas l'item à supprimer
                if ($_SESSION['panier']['id'][$i] !== $id)
                {
                    array_push( $tmp['id'],$_SESSION['panier']['id'][$i]);
                    array_push( $tmp['quantity'],$_SESSION['panier']['quantity'][$i]);
                    array_push( $tmp['price'],$_SESSION['panier']['price'][$i]);
                    array_push( $tmp['name'],$_SESSION['panier']['name'][$i]);
                    array_push( $tmp['photo'],$_SESSION['panier']['photo'][$i]);
                    array_push( $tmp['description'],$_SESSION['description']['id'][$i]);
                }

            }

            $_SESSION['panier'] =  $tmp;

            //On efface notre panier temporaire
            unset($tmp);
        }
    }

    function add_quantity($id)
    {
        if(creation_panier() and !isLocked())
        {
            $position = array_search($id,$_SESSION['panier']['id']);
            if($position !== false)
            {
                $_SESSION['panier']['quantity'][$position] += 1 ;
            }
        }
    }

    function remove_quantity($id)
    {
        if(creation_panier() and !isLocked())
        {
            $position = array_search($id,$_SESSION['panier']['id']);
            if($position !== false)
            {
                $_SESSION['panier']['quantity'][$position] -= 1 ;
                if($_SESSION['panier']['quantity'][$position] <= 0)
                {
                    delete($id);
                }
            }
        }
    }

    function total_price()
    {
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['id']); $i++)
        {
            $total += $_SESSION['panier']['quantity'][$i] * $_SESSION['panier']['price'][$i];
        }
        return $total;
    }


