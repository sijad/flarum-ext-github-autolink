matches.forEach(function(m)
{
  var tag = addSelfClosingTag(config.tagName, m[0][1], m[0][0].length);
	tag.setAttributes({
    'repo': m[1][1] >= 0 ? m[1][0] : m[3][0],
    'issue': m[2][1] >= 0 ? m[2][0] : m[4][0]
  });
	tag.setSortPriority(-10);
});
