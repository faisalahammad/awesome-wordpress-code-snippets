Add the following code in **Divi > Theme Options > Integration > Body**.

```javascript
<script>
jQuery(window).on('load', function(){
	setTimeout(function() {
		jQuery('img[usemap="#gmimap2"]').attr('style', 'width: 35px; height: 50px; top: -1px; position: relative; left: -1px;')
		jQuery('img[usemap="#gmimap2"]').attr('src', 'https://clikcloud.com/haynesambulance/files/2023/06/HeliMarker.png')
	}, 600);

	setTimeout(function() {
		jQuery('img[usemap="#gmimap1"]').attr('style', 'width: 35px; height: 50px; top: -1px; position: relative; left: -1px;')
		jQuery('img[usemap="#gmimap1"]').attr('src', 'https://clikcloud.com/haynesambulance/files/2023/06/HeliMarker.png')
	}, 600);

	setTimeout(function() {
		jQuery('img[usemap="#gmimap5"]').attr('style', 'width: 35px; height: 50px; top: -1px; position: relative; left: -1px;')
		jQuery('img[usemap="#gmimap5"]').attr('src', 'https://clikcloud.com/haynesambulance/files/2023/06/HeliMarker.png')
	}, 600);
});
</script>
```

To modify the pin width and height, use the following code in **Divi > Theme Options > General > Custom CSS**.

```css
img[usemap="#gmimap2"],
img[usemap="#gmimap1"],
img[usemap="#gmimap5"] {
  width: 35px !important;
  height: 50px !important;
}
```
