<?php
class PluginCodingCodemirror_v1{
  public function widget_include(){
    wfPlugin::includeonce('wf/yml');
    $element = new PluginWfYml(__DIR__.'/element/include.yml');
    wfDocument::renderElement($element->get());
  }
  public function widget_apply($data){
    wfPlugin::includeonce('wf/yml');
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $id = $data->get('data/id');
    $mode = null;
    if($data->get('data/mode')=='yml'){
      $mode = new PluginWfYml(__DIR__.'/mode/yml.yml');
      $mode = json_encode($mode->get());
    }elseif($data->get('data/mode')=='php'){
      $mode = new PluginWfYml(__DIR__.'/mode/php.yml');
      $mode = json_encode($mode->get());
    }
    if(!$mode || !$id){
      exit('Error in settings.');
    }
    $element = new PluginWfYml(__DIR__.'/element/apply.yml');
    $script = "var htmlEditor = CodeMirror.fromTextArea(document.getElementById('$id'),  $mode ).on('change', editor => {document.getElementById('$id').value=editor.getValue();});";
    $element->setByTag(array('script' => $script));
    wfDocument::renderElement($element->get());
  }
}
