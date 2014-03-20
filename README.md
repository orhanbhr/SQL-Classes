PHP MySQL Classes
===========

Dosyamıza Class'ımızı çağırmak için require_once fonksiyonunu kullanıoruz. <br />
<code>require_once("class.sql.php");</code>

<p>Class'ı çağırmak için aşağıdaki kod parçacığını kullanıyoruz.</p>
<code>$SQL = new SQL();</code>

<p>Select Kullanımı : </p>
<code>print_r( $SQL->Select('odds') );</code>

<p>Select Kullanarak Listelemek</p>
<pre><code>foreach( $SQL->Select('odds') as $o){
echo $o['oran_adi'].'&lt;br />';
}</code></pre>

<p>Insert Kullanımı : </p>
<pre><code>$newOdds = array(
  'mac_id' => '123123',
  'oran_tur' => 'MS',
  'oran_adi' => 'Maç Bahsi',
  'oran1' => '1.85',
  'oran1_aciklama' => 'Beşiktaş',
  'oran0' => '2.25',
  'oran0_aciklama' => 'Beraberlik',
  'oran2' => '3.15',
  'oran2_aciklama' => 'Fenerbahçe'
);

$SQL->Insert($newOdds, 'odds');</code></pre>

<p>Delete Kullanımı : </p>
<pre><code>$deleteOdds = array(
  'id' => '234',
  'oran_tur' => 'S',
  'oran1' => '1.85'
);
	
$SQL->Delete('odds', $deleteOdds);</code></pre>

<p>Update Kullanımı : </p>
<pre><code>$setOdds = array(
	'oran1' => '55.2',
	'oran0' => '12.5',
	'oran2' => '8.25'
);

$whereOdds = array(
	'id' => '237'
);

$SQL->Update('odds', $setOdds, $whereOdds);</code></pre>
