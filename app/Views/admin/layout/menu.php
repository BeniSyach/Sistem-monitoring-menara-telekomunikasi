<li class="menu-title">Dashboard</li>
<li>
    <a href="/admin" class="waves-effect">
        <i class="mdi mdi-view-dashboard"></i>
        <span> Dashboard </span>
    </a>
</li>
<li class="menu-title">Pengaturan Menu</li>
<li>
    <a href="/menu" class="waves-effect">
        <i class="mdi mdi-menu"></i>
        <span> Menu Provider </span>
    </a>
</li>
<!-- <li>
    <a href="/menu/submenu" class="waves-effect">
        <i class="mdi mdi-format-line-spacing"></i>
        <span> Sub Menu </span>
    </a>
</li> -->
<li class="menu-title">Pengaturan Menara</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i> <span> Lokasi Menara</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <?php
        $database = \Config\Database::connect();
        $db = $database->table('tab_provider')->select('*')->get()->getResultArray();
        ?>
        <?php foreach ($db as $d) : ?>
            <li class="active"><a href="/lokasi/index/<?= $d['slug'] ?>"><?= $d['nama_provider'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>

<!-- <li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-wifi"></i> <span> Detail Provider</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li class="active"><a href="/provider">PT TELKOMSEL</a></li>
        <li><a href="/lokasi/1">PT TELKOMSEL</a></li>
    </ul>
</li> -->

<li>
    <a href="/provider" class="waves-effect"><i class="mdi mdi-wifi"></i>
        <span> Detail Provider </span>
    </a>
</li>

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-clipboard-outline"></i> <span> Survey</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <?php
        $database = \Config\Database::connect();
        $db = $database->table('tab_provider')->select('*')->get()->getResultArray();
        ?>
        <?php foreach ($db as $d) : ?>
            <li class="active"><a href="/survey/index/<?= $d['slug'] ?>"><?= $d['nama_provider'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>


<li>
    <a href="/laporan" class="waves-effect">
        <i class="mdi mdi-clipboard-outline"></i>
        <span> Laporan</span>
    </a>
</li>
<li>
    <a href="/retribusi" class="waves-effect">
        <i class="mdi mdi-desktop-tower"></i>
        <span> Retribusi </span>
    </a>
</li>
<li class="menu-title">Pengaduan Masyarakat</li>
<li>
    <a href="/kritik" class="waves-effect"><i class="mdi mdi-facebook-messenger"></i>
        <span> Kritik & Saran </span>
    </a>
</li>


<div class="dropdown-divider"></div>
<li>
    <a href="/logout" class="waves-effect"><i class="mdi mdi-exit-to-app"></i><span> Logout </span></a>
</li>