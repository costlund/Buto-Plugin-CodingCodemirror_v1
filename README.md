# Buto-Plugin-CodingCodemirror_v1

Code edit.

## Include

Include in html head.

```
type: widget
data:
  plugin: coding/codemirror_v1
  method: include
```

## YML

```
-
  type: textarea
  attribute:
    id: my_textarea_yml
  innerHTML: |
    test: 1
    apa:
      - ddd
-
  type: widget
  data:
    plugin: coding/codemirror_v1
    method: apply
    data:
      id: my_textarea_yml
      mode: yml
```

## PHP

```
-
  type: textarea
  attribute:
    id: my_textarea_php
  innerHTML: |
    &lt;?php
    function test(){
      return true;
    }
-
  type: widget
  data:
    plugin: coding/codemirror_v1
    method: apply
    data:
      id: my_textarea_php
      mode: php
```
