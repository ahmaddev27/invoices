<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('products.update')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="recipient-name" class="col-form-label">اسم المنتج:</label>
                        <input type="text" class="form-control" name="Product_name" id="Product_name">

                    </div>
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                    <select name="section_id"  class="custom-select my-1 mr-sm-2" required>

                        <option value="" selected disabled> --حدد القسم--</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                        @endforeach

                    </select>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">الوصف:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-primary">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
