<div class="modal fade no-print" id="recent_transactions_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">@lang('lang_v1.recent_transactions')</h4>
			</div>
			<div class="modal-body">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_final" data-toggle="tab" aria-expanded="true"><b><i class="fa fa-check"></i> @lang('sale.final')</b></a></li>

						<li class=""><a href="#tab_quotation" data-toggle="tab" aria-expanded="false"><b><i class="fa fa-terminal"></i> @lang('lang_v1.quotation')</b></a></li>
						
						<li class=""><a href="#tab_draft" data-toggle="tab" aria-expanded="false"><b><i class="fa fa-terminal"></i> @lang('sale.draft')</b></a></li>
					</ul>
					<div class="tab-content">

						<div style="position: relative;z-index: 10;top: 10px;display: flex;align-items: center;justify-content: space-between;margin-bottom:10px;padding: 5px;border: thin solid #DDD;background-color: #f7f9fa;">
							<div style="width: 100%;">
								<input id="search_for_transaction_inp" type="text" class="form-control" placeholder="رقم الفاتورة"
									   style="direction:ltr;border-radius: 0px;">
							</div>
							<button id="search_for_transaction_btn" class="btn btn-success" style="border-radius:0;">بحث</button>

						</div>

						<div class="tab-pane active" id="tab_final">
						</div>
						<div class="tab-pane" id="tab_quotation">
						</div>
						<div class="tab-pane" id="tab_draft">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>