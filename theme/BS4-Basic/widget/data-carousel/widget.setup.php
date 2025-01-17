<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// input의 name을 wset[배열키], mo[배열키] 형태로 등록
// 기본은 wset[배열키], 모바일 설정은 mo[배열키] 형식을 가짐

?>

<ul class="list-group">
	<li class="list-group-item">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">슬라이드 설정</label>
			<div class="col-sm-10">
				<style>
					#widgetData.table { border-left:0; border-right:0; }
					#widgetData thead th { border-bottom:0; }
					#widgetData th,
					#widgetData td { vertical-align:middle; border-left:0; border-right:0; }
				</style>

				<p class="form-control-plaintext">
					<i class="fa fa-caret-right" aria-hidden="true"></i>
					이미지 주소 있는 것만 출력되며, 마우스 드래그로 위치 이동이 가능함
				</p>

				<div class="table-responsive">
					<table id="widgetData" class="table table-bordered order-list mb-0">
					<thead>
					<tr class="bg-light">
						<th class="text-center nw-20">이미지</th>
						<th class="text-center nw-18">링크</th>
						<th class="text-center">설명</th>
						<th class="text-center nw-10">타켓</th>
						<th class="text-center nw-4">삭제</th>
					</tr>
					</thead>
					<tbody id="sortable">
					<?php 

					// 직접등록 입력폼 
					$data = array();
					$data_cnt = (isset($wset['d']['img']) && is_array($wset['d']['img'])) ? count($wset['d']['img']) : 1;

					// 이미지 검색주소
					$img_search_href = na_theme_href('image', 'title');

					for($i=0; $i < $data_cnt; $i++) {
						$n = $i + 1;
						$d_img = isset($wset['d']['img'][$i]) ? $wset['d']['img'][$i] : '';
						$d_link = isset($wset['d']['link'][$i]) ? $wset['d']['link'][$i] : '';
						$d_alt = isset($wset['d']['alt'][$i]) ? $wset['d']['alt'][$i] : '';
						$d_target = isset($wset['d']['target'][$i]) ? $wset['d']['target'][$i] : '';

					?>
						<tr class="bg-light<?php echo ($i%2 != 0) ? '' : '-1';?>">
						<td>
							<div class="input-group">
								<input type="text" id="img_<?php echo $n ?>" name="wset[d][img][]" value="<?php echo $d_img ?>" class="form-control" placeholder="http://...">
								<div class="input-group-append">
									<a href="<?php echo $img_search_href.'&amp;fid=img_'.$n; ?>" class="btn btn-primary btn-setup">
										<i class="fa fa-search"></i>
									</a>
								</div>
							</div>
						</td>
						<td>
							<input type="text" id="link_<?php echo $n ?>" name="wset[d][link][]" value="<?php echo $d_link ?>" class="form-control" placeholder="http://...">
						</td>
						<td>
							<input type="text" id="alt_<?php echo $n ?>" name="wset[d][alt][]" value="<?php echo $d_alt ?>" class="form-control">
						</td>
						<td>
							<select id="target_<?php echo $n ?>" name="wset[d][target][]" class="custom-select">
								<option value="_self">현재 창</option>
								<option value="_blank"<?php echo get_selected('_blank', $d_target)?>>새 창</option>
							</select>
						</td>
						<td class="text-center">
							<?php if($i > 0) { ?>
								<a href="javascript:;" class="ibtnDel"><i class="fa fa-times-circle fa-2x text-muted"></i></a>
							<?php } ?>
						</td>
						</tr>
					<?php } ?>
					</tbody>
					</table>
				</div>

				<div class="text-center mt-3">
					<button type="button" class="btn btn-outline-primary btn-lg en" id="addrow">
						Add Slide
					</button>
				</div>	
			</div>
		</div>
	</li>

	<li class="list-group-item">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">슬라이더 옵션</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
					<th class="text-center nw-c1">구분</th>
					<th class="text-center nw-c2">설정</th>
					<th class="text-center">비고</th>
					</tr>
					<tr>
					<td class="text-center">수동 실행</td>
					<td class="text-center">
						<div class="custom-control custom-checkbox">
							<?php $wset['auto'] = isset($wset['auto']) ? $wset['auto'] : ''; ?>
							<input type="checkbox" name="wset[auto]" value="1"<?php echo get_checked('1', $wset['auto'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
							<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
						</div>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>
					<tr>
					<td class="text-center">랜덤 출력</td>
					<td class="text-center">
						<div class="custom-control custom-checkbox">
							<?php $wset['rand'] = isset($wset['rand']) ? $wset['rand'] : ''; ?>
							<input type="checkbox" name="wset[rand]" value="1"<?php echo get_checked('1', $wset['rand'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
							<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
						</div>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>
					<tr>
					<td class="text-center">화살표 숨김</td>
					<td class="text-center">
						<div class="custom-control custom-checkbox">
							<?php $wset['arrow'] = isset($wset['arrow']) ? $wset['arrow'] : ''; ?>
							<input type="checkbox" name="wset[arrow]" value="1"<?php echo get_checked('1', $wset['arrow'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
							<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
						</div>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>
					<tr>
					<td class="text-center">네비 숨김</td>
					<td class="text-center">
						<div class="custom-control custom-checkbox">
							<?php $wset['nav'] = isset($wset['nav']) ? $wset['nav'] : ''; ?>
							<input type="checkbox" name="wset[nav]" value="1"<?php echo get_checked('1', $wset['nav'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
							<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
						</div>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>
					<tr>
					<td class="text-center">페이드 효과</td>
					<td class="text-center">
						<div class="custom-control custom-checkbox">
							<?php $wset['fade'] = isset($wset['fade']) ? $wset['fade'] : ''; ?>
							<input type="checkbox" name="wset[fade]" value="1"<?php echo get_checked('1', $wset['fade'])?> class="custom-control-input" id="idCheck<?php echo $idn ?>">
							<label class="custom-control-label" for="idCheck<?php echo $idn; $idn++; ?>"></label>
						</div>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>
					<tr>
					<td class="text-center">그림자 효과</td>
					<td>
						<?php $wset['shadow'] = isset($wset['shadow']) ? $wset['shadow'] : ''; ?>
						<select name="wset[shadow]" class="custom-select">
							<?php echo na_shadow_options($wset['shadow'])?>
						</select>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

	<li class="list-group-item">
		<div class="form-group row mb-0">
			<label class="col-sm-2 col-form-label">캐러셀 높이</label>
			<div class="col-sm-10">
				<p class="form-control-plaintext">
					<i class="fa fa-caret-right" aria-hidden="true"></i>
					높이 단위(px, %)까지 모두 입력해야며, 비율(%)은 가로대비 세로비로 계산
				</p>
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
					<tbody>
					<tr class="bg-light">
						<th class="text-center nw-c1">구분</th>
						<th class="text-center nw-c2">설정</th>
						<th class="text-center">비고</th>
					</tr>
					<tr>
					<td class="text-center">1200px 이상</td>
					<td>
						<?php $wset['xl'] = isset($wset['xl']) ? $wset['xl'] : ''; ?>
						<input name="wset[xl]" value="<?php echo $wset['xl'] ?>" class="form-control">
					</td>
					<td class="text-muted">PC / 데스크탑 사이즈</td>
					</tr>
					<tr>
					<td class="text-center">992px 이상</td>
					<td>
						<?php $wset['lg'] = isset($wset['lg']) ? $wset['lg'] : ''; ?>
						<input name="wset[lg]" value="<?php echo $wset['lg'] ?>" class="form-control">
					</td>
					<td class="text-muted" rowspan="2">테블릿 사이즈</td>
					</tr>
					<tr>
					<td class="text-center">768px 이상</td>
					<td>
						<?php $wset['md'] = isset($wset['md']) ? $wset['md'] : ''; ?>
						<input name="wset[md]" value="<?php echo $wset['md'] ?>" class="form-control">
					</td>
					</tr>
					<tr>
					<td class="text-center">576px 이상</td>
					<td>
						<?php $wset['sm'] = isset($wset['sm']) ? $wset['sm'] : ''; ?>
						<input name="wset[sm]" value="<?php echo $wset['sm'] ?>" class="form-control">
					</td>
					<td class="text-muted" rowspan="2">모바일 사이즈</td>
					</tr>
					<tr>
					<td class="text-center">0px 이상</td>
					<td>
						<?php $wset['xs'] = isset($wset['xs']) ? $wset['xs'] : ''; ?>
						<input name="wset[xs]" value="<?php echo $wset['xs'] ?>" class="form-control">
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

</ul>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> 
<script>
$(document).ready(function () {
	var counter = <?php echo $data_cnt + 1 ?>;
	$("#addrow").on("click", function () {
		var trbg = (counter%2 === 1) ? 'bg-light-1' : 'bg-light';
		var newRow = $("<tr class=" + trbg + ">");
		var cols = "";

		cols += '<td>';
		cols += '	<div class="input-group">';
		cols += '		<input type="text" id="img_' + counter + '" name="wset[d][img][]" class="form-control" placeholder="http://...">';
		cols += '		<div class="input-group-append">';
		cols += '			<a href="<?php echo $img_search_href ?>&amp;fid=img_' + counter + '" class="btn btn-primary btn-setup">';
		cols += '				<i class="fa fa-search"></i>';
		cols += '			</a>';
		cols += '		</div>';
		cols += '	</div>';
		cols += '</td>';
		cols += '<td>';
		cols += '	<input type="text" id="link_' + counter + '" name="wset[d][link][]" class="form-control" placeholder="http://...">';
		cols += '</td>';
		cols += '<td>';
		cols += '	<input type="text" id="alt_' + counter + '" name="wset[d][alt][]" class="form-control">';
		cols += '</td>';
		cols += '<td>';
		cols += '	<select id="target_' + counter + '" name="wset[d][target][]" class="custom-select">';
		cols += '	<option value="_self">현재 창</option>';
		cols += '	<option value="_blank">새 창</option>';
		cols += '	</select>';
		cols += '</td>';
		cols += '<td class="text-center">';
		cols += '	<a href="javascript:;" class="ibtnDel"><i class="fa fa-times-circle fa-2x text-muted"></i></a>';
		cols += '</td>';

		newRow.append(cols);
		$("table.order-list").append(newRow);
		counter++;
	});

	$("table.order-list").on("click", ".ibtnDel", function (event) {
		$(this).closest("tr").remove();
	});

	$("#sortable").sortable();
});
</script>
