<div class="panel panel-danger well">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Suscribete <strong>GRATIS</strong> a nuestros Boletines!</h3>
  </div>
  <div class="panel-body text-center">

    <div id="mc_embed_signup">
    {!! Form::open(['url' => '//contabilizalo.us8.list-manage.com/subscribe/post?u=e2022d3fafe1722d98b7e590d&amp;id=d389ec3648', 'class' => 'form-inline validate', 'id' => 'mc-embedded-subscribe-form','name' => 'mc-embedded-subscribe-form', 'target' => '_blank', 'novalidate']) !!}
      <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">Email address</label>    
        {!! Form::text('FNAME', null, ['class' => 'form-control', 'id' => 'mce-FNAME', 'placeholder' => 'Inserte su Nombre']) !!}
      </div>
      <div class="form-group">
        <label class="sr-only" for="exampleInputPassword3">Password</label>
        {!! Form::email('EMAIL', null, ['class' => 'form-control required email', 'placeholder' => 'Inserte su Email']) !!}
      </div>
      <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
      </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;" aria-hidden="true">
        <input type="text" name="b_e2022d3fafe1722d98b7e590d_d389ec3648" tabindex="-1" value="">
      </div>
      <div class="clear text-center">
        <input type="submit" value="Suscribir" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">   
      </div>
    {!! Form::close() !!}
    </div>

  </div>
</div>