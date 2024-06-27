<?php 
class Flasher{
	public static function setFlash($pesan, $ket, $icon, $bg){
		$_SESSION['flash'] = [
			'pesan'	=> $pesan,
			'ket'	=> $ket,
			'icon'	=> $icon,
			'bg'	=> $bg
		];
	}

	public static function flash(){
		if ( isset($_SESSION['flash']) ) {
			echo '
				<div class="animate__animated animate__fadeInDown animate__faster alert alert-' . $_SESSION['flash']['bg'] . ' alert-dismissible fade show" role="alert">
					<strong><i data-feather="' . $_SESSION['flash']['icon'] . '" style="height: 18px; width: 18px;"></i> ' . $_SESSION['flash']['ket'] . '!</strong> ' . $_SESSION['flash']['pesan'] .'
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			';
			unset($_SESSION['flash']);
		}
	}
}

