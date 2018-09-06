$(function() {
	$('.modal_ajax').on('click', function(e) {
		e.preventDefault();//Evitamos que o clique no botão abra a página que foi direcionada
		$('.modal_bg').show(); //Abrindo nosso modal
		$('.modal').html('Carregando ... '); //Mostrando o modal e insere o html carregando
	});
});