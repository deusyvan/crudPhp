$(function() {
	$('.modal_ajax').on('click', function(e) {
		e.preventDefault();//Evitamos que o clique no botão abra a página que foi direcionada
		$('.modal').html('Carregando ... '); //Assim troca o conteúdo e mostra o carregando certinho
		$('.modal_bg').show(); //Abrindo nosso modal
		
		var link = $(this).attr('href'); // Buscando o link pelo atributo href
		
		$.ajax({
			url:link,
			type:'GET',
			success:function(html){//Recebe o html
				$('.modal').html(html);//O modal recebe esse html do link dentro do modal
			}
		});
	});
});