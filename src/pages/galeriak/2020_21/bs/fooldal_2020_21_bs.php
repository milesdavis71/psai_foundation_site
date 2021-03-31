{{> hover}}

<div class="cell medium-9 medium-cell-block-y">
<style>
  .headers {
    top: 0;
    position: -webkit-sticky;
    position: sticky;
    z-index: 1;
  }

  .tracks,
  .scroller {
    display: flex;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
  }
  .scroller {
    overflow-x: hidden;
  }
</style>

<div class="headers">
  <div class="scroller">
    <ul class="menu simple">
      <li style="padding: 0.7rem 1rem;"><a href="{{root}}galeriak/2020_21/ps/fooldal_2020_21_ps.php">Székhely</a></li>
      <li class="is-active"><a href="{{root}}galeriak/2020_21/bs/fooldal_2020_21_bs.php" style="padding: 0.7rem 1rem;">Tagiskola</a></li>
    </ul>
  </div>
</div>


  <h3 class="text-center">Szegedi Petőfi Sándor Általános Iskola<br />
    Bálint Sándor Tagiskola<br>
    <small>Fotógalériák 2020–2021</small></h3>
  <hr>

  <div class="grid-x grid-margin-x">
    <?php
      //set main directory
      $mainDir = '../../../assets/img/galeriak/2020_21/bs/';

      //gets sub directories of PDFS directory
      $subDirectories = scandir($mainDir);

      //removes the first two indexes in the directories array that are just dots
      unset($subDirectories[0]);
      unset($subDirectories[1]);

      // first loop through all sub directories ...
      foreach($subDirectories as $subDirectory) {
          echo '
        <div class="cell small-12 large-3">
    <div class="cell">
      <div class="card">';




        foreach (glob($mainDir . '/' . $subDirectory . '/*.jpg') as $file) {
        $albumcim = file_get_contents($mainDir . '/' . $subDirectory .'/'.'album.txt');

        if (isset($_POST['submit'])){
        $name=$_POST['folder'];
        $cim=$_POST['title'];
        }
        echo '<form action="galeria_2020_21_bs.php" method="post">
          <img src="' . $file . '">
          <div class="card-section">

            <p class="text-center">'.$albumcim.'</p>
            <input type="hidden" value="'.$subDirectory.'" name="folder">
            <input type="hidden" value="'.$albumcim.'" name="title">
            <p class="text-center"><input class="hollow button small" type="submit" value="Megnyitás"
                                          name="submit" style="margin-top: 0.5rem; margin-bottom: -0.5rem"></p>
          </div>
        </form>

      </div>
    </div>
  </div>
  ';
  break;
  }
  }
  ?>
  </div>


  {{> vissza}}

</div>