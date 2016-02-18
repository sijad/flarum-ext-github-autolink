matches.forEach(function(m)
{
  addSelfClosingTag(config.tagName, m[1][1], m[1][0].length);
});