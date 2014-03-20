PHP MySQL Classes
===========

Dosyamıza Class'ımızı çağırmak için require_once fonksiyonunu kullanıoruz. <br />
<code>require_once("class.sql.php");</code>

<p>Class'ı çağırmak için aşağıdaki kod parçacığını kullanıyoruz.</p>
<code>$SQL = new SQL();</code>

<p>Select Kullanımı : </p>
<code>print_r( $SQL->Select('odds') );</code>

<p>Select Kullanarak Listelemek</p>
<code>foreach( $SQL->Select('odds') as $o){
		echo $o['oran_adi'].'<br />';
	}</code>
