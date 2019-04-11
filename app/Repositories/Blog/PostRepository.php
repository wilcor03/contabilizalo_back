<?php
namespace App\Repositories\Blog;

use Cache;

/**-----------------
! MODELS
---------------------*/
use App\Models\Blog\Post;
use App\Models\Blog\Recommendedable;

class PostRepository
{
	protected $recommendedable;
	
	public function __construct(Recommendedable $recommendedable)
	{
		$this->recommendedable = $recommendedable;
	}

	public function toggleRecommendedPost($recommendedPost, $editingPost = null)
	{
		$exitsPost = Recommendedable::existsRecommended($recommendedPost, $editingPost);

		if($exitsPost)
		{
			$exitsPost->delete();
			return true;
		}

		if($editingPost != null)
		{
			$recommendedPost->posts()->attach($editingPost);
			return true;
		}

		$user = auth()->user();
		$user->posts()->attach($recommendedPost);
		return true;
	}

	public function _store($data)
	{		
		$post = new Post();
		$post->fill($data);
		$post->category()->associate($data['category_id']);
		$post->user()->associate(auth()->user());
		$post->save();
		return $post;
	}

	public function _update($data, $post)
	{
		$post->fill($data);
		$post->category()->associate($data['category_id']);
		$post->save();
		return $post;
	}

	public function attachObj($post)
	{
		$user = \Auth::user();

		$update = $this->recommendedable->where(function($q) use($user) {
  									$q->where('recommendedable_id', $user->id)
  						 				->where('recommendedable_type', $user->getMorphClass());
  								})
									->update(['recommendedable_id' => $post->id, 'recommendedable_type' => $post->getMorphClass()]);

		return $update;
	}

	public function _previousPost($post)//actual post
	{

		$collection = $this->_getCollectionCategory($post);
	  
	  $filtered 	= $collection->filter(function($value, $key) use($post){
	  	return $value->id < $post->id;
	  });

	  $maxID    = $filtered->max('id');  

    $prevPost = $filtered->first(function ($value, $key) use($maxID){
		  return $value->id === $maxID;
		});

    return $prevPost;
	}

	public function _nextPost($post)//actual post
	{

		$collection = $this->_getCollectionCategory($post);
	  
	  $filtered 	= $collection->filter(function($value, $key) use($post){
	  	return $value->id > $post->id;
	  });

	  $minID    = $filtered->min('id');  

    $nextPost = $filtered->first(function ($value, $key) use($minID){
		  return $value->id === $minID;
		});

    return $nextPost;
	}

	public function _getCollectionCategory($post)// $sign = "<" or ">"
	{
		$minutes = config('custom.cache.time_duration_in_previous_next');
		$value = Cache::remember('postsCat'.$post->category_id, $minutes, function() use($post) {
    	return Post::postByCategory($post->category_id)    				
    				->orderBy('id')
    				->where('status', 'public')
    				->get();
		});

		return $value;
		
	}

	public function _principalPost($post)
	{
		return $post->category->post;
	}

	public function setSellingCourses()
	{
		return 
				[
          2 => [
          				'title' => 'Contabilidad Intermedia', 
          				'price' => 19990,	
          				'button' => 
										  '<form method="post" action="https://gateway.payulatam.com/ppp-web-gateway/pb.zul" accept-charset="UTF-8">
										  <input type="image" border="0" alt="" src="https://contabilizalo.com/images/btn_comprar_contabilizalo.png" onClick="this.form.urlOrigen.value = window.location.href;"/>
										  <input name="buttonId" type="hidden" value="bviRKR7fzfC4iVG8Qao3mISWDuGnh47Ak3aSatkFN+vt6+0g0a5yug=="/>
										  <input name="merchantId" type="hidden" value="503049"/>
										  <input name="accountId" type="hidden" value="503953"/>
										  <input name="description" type="hidden" value="Curso Contabilidad Intermedia Avanzada"/>
										  <input name="referenceCode" type="hidden" value="cont_intermedia"/>
										  <input name="amount" type="hidden" value="19990"/>
										  <input name="tax" type="hidden" value="0"/>
										  <input name="taxReturnBase" type="hidden" value="0"/>
										  <input name="shipmentValue" value="0" type="hidden"/>
										  <input name="currency" type="hidden" value="COP"/>
										  <input name="lng" type="hidden" value="es"/>
										  <input name="approvedResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-exitoso"/>
										  <input name="declinedResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-no-exitoso"/>
										  <input name="pendingResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-pendiente"/>
										  <input name="displayShippingInformation" type="hidden" value="NO"/>
										  <input name="displayBuyerComments" type="hidden" value="true"/>
										  <input name="sourceUrl" id="urlOrigen" value="" type="hidden"/>
										  <input name="buttonType" value="SIMPLE" type="hidden"/>
										  <input name="signature" value="660506e5d05a95af0c2142db45bb001d58bba006de1c96e402d6ae481ff9b25d" type="hidden"/>
										</form>'
          			],
          4 => [
          				'title' => 'Excel Profesional', 
          				'price' => 14990,
          				'button' => 
          				'<form method="post" action="https://gateway.payulatam.com/ppp-web-gateway/pb.zul" accept-charset="UTF-8">
									  <input type="image" border="0" alt="" src="https://contabilizalo.com/images/btn_comprar_contabilizalo.png" onClick="this.form.urlOrigen.value = window.location.href;"/>
									  <input name="buttonId" type="hidden" value="IFSBnt69fK1ilRTVdpjRIGeFzD5okaDRr4fJX185qIhJA+Z7bI7Mtw=="/>
									  <input name="merchantId" type="hidden" value="503049"/>
									  <input name="accountId" type="hidden" value="503953"/>
									  <input name="description" type="hidden" value="Curso de Excel Profesional"/>
									  <input name="referenceCode" type="hidden" value="excel_profesional"/>
									  <input name="amount" type="hidden" value="14990"/>
									  <input name="tax" type="hidden" value="0"/>
									  <input name="taxReturnBase" type="hidden" value="0"/>
									  <input name="shipmentValue" value="0" type="hidden"/>
									  <input name="currency" type="hidden" value="COP"/>
									  <input name="lng" type="hidden" value="es"/>
									  <input name="approvedResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-exitoso"/>
									  <input name="declinedResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-no-exitoso"/>
									  <input name="pendingResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-pendiente"/>
									  <input name="displayShippingInformation" type="hidden" value="NO"/>
									  <input name="displayBuyerComments" type="hidden" value="true"/>
									  <input name="sourceUrl" id="urlOrigen" value="" type="hidden"/>
									  <input name="buttonType" value="SIMPLE" type="hidden"/>
									  <input name="signature" value="b0757536c56476de7f7a67197df027ba6aae79ed144e42e9129864ea1dbd7a48" type="hidden"/>
									</form>'
          			], 
          7 => [
          			'title' => 'Laboral y Nómina', 
          			'price' => 14990,
          			'button' => 
          			'<form method="post" action="https://gateway.payulatam.com/ppp-web-gateway/pb.zul" accept-charset="UTF-8">
							  <input type="image" border="0" alt="" src="https://contabilizalo.com/images/btn_comprar_contabilizalo.png" onClick="this.form.urlOrigen.value = window.location.href;"/>
							  <input name="buttonId" type="hidden" value="Tkk/djYSG+hWMoE4AoFWVESkgbgLWn9+KUrFLgvQ7NOyGOPrxFv16Q=="/>
							  <input name="merchantId" type="hidden" value="503049"/>
							  <input name="accountId" type="hidden" value="503953"/>
							  <input name="description" type="hidden" value="Curso de Nómina y Laboral"/>
							  <input name="referenceCode" type="hidden" value="laboral_nomina"/>
							  <input name="amount" type="hidden" value="14990"/>
							  <input name="tax" type="hidden" value="0"/>
							  <input name="taxReturnBase" type="hidden" value="0"/>
							  <input name="shipmentValue" value="0" type="hidden"/>
							  <input name="currency" type="hidden" value="COP"/>
							  <input name="lng" type="hidden" value="es"/>
							  <input name="approvedResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-exitoso"/>
							  <input name="declinedResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-no-exitoso"/>
							  <input name="pendingResponseUrl" type="hidden" value="https://contabilizalo.com/payu/pago-pendiente"/>
							  <input name="displayShippingInformation" type="hidden" value="NO"/>
							  <input name="displayBuyerComments" type="hidden" value="true"/>
							  <input name="sourceUrl" id="urlOrigen" value="" type="hidden"/>
							  <input name="buttonType" value="SIMPLE" type="hidden"/>
							  <input name="signature" value="647d7b8ef546cd1af3eb2db64ba871ed27ed08fe25294f632d9e3dddaf14f98d" type="hidden"/>
							</form>'
          		],
        ];
	}
}