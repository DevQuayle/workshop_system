<meta http-equiv="refresh" content="5; URL=<?= site_url('welcome')?>">
<style>
 .shadowBox{
  background-color: rgba(0,0,0,0.6);
  width: 500px;
  height: 300px;
   position: absolute;
   top: 50%;
   margin-top: -150px;
   left: 20%;
   right:20%;
   width: 60%;
   padding: 0 40px;
 }
 h1{
  color: white;
  font-weight: bold;

 }
 p{
  font-size:16px;
  color: whitesmoke;
 }
 p span{
  color:greenyellow;
 }
</style>
<body class="noaccess">
  <div class="container">
  <div class="shadowBox">
<h1> - BRAK DOSTĘPU! - </h1>
<p><span>Nie masz dostępu do działania na tej stronie.</span></p>
<p>Najprawdopodobniej chciałeś zrobić czynność która nie należy do Twoich obowiazków. 
Jeśli jednak coś jest nie tak, proszę o kontakt z Administratorem serwisu, w celu wyjaśnienia zaistniałej sytuacji :)</p>
<p> Za chwilę zostaniesz przekeirowany na stronę z dostępem, jeśli przekierowanie nie nastapi w ciagu 5 sekund 
<a href="<?= site_url('welcome') ?>"> KLIKNIJ </a> </p>
  </div>
</body>