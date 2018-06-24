 
  <!-- Navigation Vertical-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">DISKOMINFO JABAR</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="as_admin.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
<!--    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="profil_admin.php">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text">Profil Saya (lihat comment)<!--(dan KADIN (Data kepegawaian,akun) Belum)</span>
          </a>
        </li> -->
<!--         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="data_pns.php">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Matriks Kepegawaian <i class="fa fa-check"></i></span>
          </a>
        </li> -->

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-address-book"></i>
            <span class="nav-link-text">Data Entitas <i class="fa fa-check"></i></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents3">
            <li>
              <a href="data_siswa.php">Data Siswa </a>
            </li>
            <li>
              <a href="data_ortu.php">Data Orang Tua Siswa</a>
            </li>
            <li>
              <a href="data_guru.php">Data Guru </a>
            </li>
          </ul>
        </li>
        </li>
        


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents5" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Data Kenggotaan Kelas<i class="fa fa-check"></i></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents5">
            <li>
              <a href="data_kelas.php">Daftar Kelas</a>
            </li>
            <li>
              <a href="data_anggota.php">Daftar Anggota Kelas</a>
            </li>
          </ul>
        </li>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text">Data Akun <i class="fa fa-check"></i></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents4">
            <li>
              <a href="akun_siswa.php">Akun Siswa </a>
            </li>
            <li>
              <a href="akun_ortu.php">Akun Orang Tua Siswa </a>
            </li>
            <li>
              <a href="akun_guru.php">Akun Guru </a>
            </li>
            <li>
              <a href="akun_admin.php">Akun Administrator</a>
            </li>
          </ul>
        </li>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="mapel.php">
            <i class="fa fa-fw fa-pencil-square-o"></i>
            <span class="nav-link-text">Daftar Mapel <i class="fa fa-check"></i></span>
          </a>
        </li>
        
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="pengumuman.php">
            <i class="fa fa-fw fa-pencil-square-o"></i>
            <span class="nav-link-text">Buat Pengumuman <i class="fa fa-check"></i></span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="atur_absensi.php">
            <i class="fa fa-fw fa fa-calendar"></i>
            <span class="nav-link-text">Setting Absensi <i class="fa fa-check"></i></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
    <!-- end-->
    <!-- Navigation Horizontal -->
      <ul class="navbar-nav ml-auto"> 
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="JS-Boostrap">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- end -->