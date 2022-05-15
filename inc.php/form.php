<?php

echo"<div id='contenu_cre_form'>";

include('form/traitementform.php');
       echo" <form action='' method='post'>
        <div id='nom'>
        <label>Nom:</label>
          <input type='text' name='nomperso' id='nomperso'></input>
        </div>
        <div id='titre'>
          <label id='titre-avatar'>Avatar: </label><label id='titre-description'>Description:</label>
        </div>
        <div id='ppEtDesc'>
        <div id='gauche'>
          <label class='profile_pic'>
          <div class='box'>
            <img src=''.$img_profil.'' alt='Your profile image here !' onerror='this.onerror=null; this.src='.$default_img.''>
            <input type='file' name='prof_pic' style='display:none'>
          </div>
          </label>
          <input type='submit' name='submit' value='Enregistrer'>
        </div>
        <div id='droite'>
          <textarea name='persodesc' id='description' rows='5' cols='50' maxlength='512' placeholder='Décrivez votre univers...'></textarea><br />
     		  <label id='max'>Longueur maximale: 512 caractères.</label>
          <ul>
            <li>
            <label>Race: </label>
            <select name='race' id='race-select'>
              <option value=''>--Choisir une race--</option>
              <option value='1'>1</option>
              <option value='2'>2</option>
              <option value='3'>3</option>
              <option value='4'>4</option>
            </select>
            </li>
            <li>
            <label>Classe:</label>
            <select name='classe' id='classe-select'>
              <option value=''>--Choisir une classe--</option>
              <option value='1'>1</option>
              <option value='2'>2</option>
              <option value='3'>3</option>
              <option value='4'>4</option>
            </select>
            </li>
            <li>
            <label>Age:</label>
            <input type='number' name='age'  id='age' min='1' max='1000'></input>
            </li>
            <li>
            <label>Taille:</label>
            <input type='number' name='taille' step='.01' id='taille' min='1' max='20' ></input>
            <label>(en m)</label>
            </li>
            <li>
              <label>Poids:</label>
              <input type='number' name='poids' step='.01' id='poids' min='0' max='300' ></input>
              <label>(en kg)</label>
            </li>
          </ul>
          </div>
        </div>
        <div id='caracteristiques'>
          <div>
          <label>Caracteristiques:</label>
        </div>
        <div>
          <a href='#openModal'><input type='button' onclick='location.href='#';' value='Attribuer' /></a>
          <div id='openModal' class='modalDialog'>
            <div>
              <a href='#close' title='Close' class='close'>X</a>
              <h2>Caracteristiques</h2>
              <p>Cette boîte modale est créée en utilisant les pouvoirs de CSS3.</p>
            </div>
            <a href='#close' title='Close' class='close'>x</a>
          </div>
        </div>
        </div>
      <div id='EnvoyerEtReset'>
        <input type='reset' value='Reset'>
          <input type='submit' name='submit' value='Enregistrer'>
    </div>
        </form>
      </div>";

      include('../footer.php');
?>
