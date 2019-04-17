<?php

//include_once('microDAO.php');

//echo "sou a página que faz consulta de REGIÃO pelo DDD";
//echo "<br>";

//echo "você me manda o DDD, e eu retorno a região dele";

//echo "<br>";
//echo "<br>";

$ddd = '';
$região = '';

if (isset($_GET['ddd'])) {
	$ddd = $_GET['ddd'];
	start($ddd);
}

function getMyRegiao($dddteste){
	$ddd = $dddteste;
	start($ddd);
}

function start($ddd){

	switch ($ddd) {

		/* SP */
		case '11':
		echo "São Paulo e região - SP";
		break;

		case '16':
		echo "Ribeirão Preto e região - SP";
		break;

		case '12':
		echo "Vale do Paraíba e Lítoral Norte - SP";
		break;

		case '17':
		echo "São José do Rio Preto e região - SP";
		break;

		case '13':
		echo "Baixada Santista e Litoral Sul - SP";
		break;

		case '18':
		echo "Presidente Prudente e região - SP";
		break;

		case '14':
		echo "Bauru, Marília e região - SP";
		break;

		case '19':
		echo "Grande Campinas - SP";
		break;

		case '15':
		echo "Sorocaba e região - SP";
		break;

		/* -x-x-x-x-x */


		/* BA */

		case '71':
		echo "Salvador - BA";
		break;

		case '73':
		echo "Sul da Bahia - BA";
		break;

		case '75':
		echo "Feira de Santana, Alagoinhas e região - BA";
		break;

		case '77':
		echo "V. da Conquista, Barreiras e região - BA";
		break;

		case '74':
		echo "Juazeiro, Jacobina e região - BA";
		break;


		/* -x-x-x-x-x-x */

		/* RJ */

		case '21':
		echo "Rio de Janeiro e região - RJ";
		break;

		case '24':
		echo "Serra, Angra dos Reis e região - RJ";
		break;

		case '22':
		echo "Norte do Estado e Região dos Lagos - RJ";
		break;

		/* -x-x-x-x-x-x */


		/* MG */

		case '31':
		echo "Belo Horizonte e região - MG";
		break;

		case '35':
		echo "Poços de Caldas e Varginha - MG";
		break;

		case '32':
		echo "Juiz de Fora e região - MG";
		break;	

		case '37':
		echo "Divinópolis e região - MG";
		break;

		case '33':
		echo "Gov. Valadares, T. Otoni e região - MG";
		break;

		case '38':
		echo "Montes Claros, Diamantina e região - MG";
		break;

		case '34':
		echo "Uberlândia, Uberaba e região - MG";
		break;

		/* -x-x-x-x-x-x */

		/* PR */

		case '41':
		echo "Curitiba e região - PR";
		break;

		case '44':
		echo "Maringá e região - PR";
		break;

		case '42':
		echo "Ponta Grossa, Guarapuava e região - PR";
		break;	

		case '45':
		echo "Foz do Iguaçu, Cascavel e região - PR";
		break;

		case '43':
		echo "Londrina e região - PR";
		break;

		case '46':
		echo "F. Beltrão e Pato Branco e região - PR";
		break;

		/* -x-x-x-x-x-x */

		/* RS */

		case '51':
		echo "Porto Alegre e região - RS";
		break;

		case '54':
		echo "Caxias do Sul e região - RS";
		break;

		case '53':
		echo "Pelotas, Bagé, Rio Gde e região - RS";
		break;	

		case '55':
		echo "Sta Maria, Cruz Alta e região - RS";
		break;

		/* -x-x-x-x-x-x */


		/* SC */

		case '47':
		echo "Norte de Santa Catarina - SC";
		break;

		case '49':
		echo "Oeste de Santa Catarina - SC";
		break;

		case '48':
		echo "Florianópolis e região - SC";
		break;	

		/* -x-x-x-x-x-x */

		/* ES */

		case '27':
		echo "Norte do Espírito Santo - ES";
		break;

		case '28':
		echo "Sul do Espírito Santo - ES";
		break;

		/* -x-x-x-x-x-x */


		/* PE */

		case '81':
		echo "Grande Recife - PE";
		break;

		case '87':
		echo "Petrolina, Garanhuns e região - PE";
		break;

		/* -x-x-x-x-x-x */


		/* DF */

		case '61':
		echo "Brasília, Outras Cidades e região - DF";
		break;


		/* -x-x-x-x-x-x */


		/* CE */

		case '85':
		echo "Fortaleza e Região - CE";
		break;

		case '88':
		echo "Juazeiro do Norte, Sobral e região - CE";
		break;

		/* -x-x-x-x-x-x */


		/* MS */

		case '67':
		echo "Campo Grande, Outras Cidades e região - MS";
		break;

		/* -x-x-x-x-x-x */


		/* GO */

		case '62':
		echo "Grande Goiânia e Anápolis - GO";
		break;

		case '64':
		echo "Rio Verde, Caldas Novas e região - GO";
		break;

		/* -x-x-x-x-x-x */


		/* AM */

		case '92':
		echo "Região de Manaus - AM";
		break;

		case '97':
		echo "Leste do Amazonas - AM";
		break;

		/* -x-x-x-x-x-x */


		/* RN*/

		case '84':
		echo "Natal, Outras Cidades - RN";
		break;


		/* PB*/

		case '83':
		echo "João Pessoa, Campina Grande, Guarabira, Outras Cidades e região - PB";
		break;

		/* PA */

		case '91':
		echo "Região de Belém - PA";
		break;

		case '94':
		echo "Região de Marabá - PA";
		break;

		case '93':
		echo "Região de Santarém - PA";
		break;


		/* MT */

		case '65':
		echo "Cuiabá e região - MT";
		break;

		case '66':
		echo "Rondonópolis, Sinop e região - MT";
		break;


		/* AL */

		case '82':
		echo "Maceió, Outras Cidades - AL";
		break;

		/* SE */

		case '79':
		echo "Aracaju, Outras Cidades - SE";
		break;


		/* MA */

		case '98':
		echo "Região de São Luís - MA";
		break;

		case '99':
		echo "Imperatriz, Caxias e região - MA";
		break;


		/* AC */

		case '68':
		echo "Rio Branco, Outras Cidades - AC";
		break;


		/* RO */

		case '69':
		echo "Porto Velho, Outras Cidades - RO";
		break;


		/* TO */

		case '63':
		echo "Palmas, Outras Cidades - TO";
		break;


		/* PI */

		case '86':
		echo "Teresina, Parnaíba e região - PI";
		break;

		case '89':
		echo "Picos, Floriano e região - PI";
		break;


		/* AP */

		case '96':
		echo "Macapá, Outras Cidades - AP";
		break;


		/* RR */

		case '95':
		echo "Boa Vista, Outras Cidades - RR";
		break;









	}
}

	?>