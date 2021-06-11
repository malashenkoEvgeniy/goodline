<div class="card card-secondary">
    <div class="card-header"> <h3 class="card-title">Seo</h3></div>

    <div class="card-body">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Seo Заголовок</span>
            </div>
            <input type="text" class="form-control" name="seo_title" value="@isset($page->translate()->seo_title){{$page->translate()->seo_title}}@endisset">
        </div>

        <div class="form-group">
            <label>Seo Описание</label>
            <textarea  class="form-control" name="seo_description" id="editor2" >
                @isset($page->translate()->seo_description){{$page->translate()->seo_description}}@endisset
            </textarea>
        </div>

        <div class="form-group">
            <label>Seo ключевые слова</label>
            <textarea class="form-control" name="seo_keywords" id="editor3" >
                @isset($page->translate()->seo_keywords){{$page->translate()->seo_keywords}}@endisset
            </textarea>
        </div>
    </div>
</div>
