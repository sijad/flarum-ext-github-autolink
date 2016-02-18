import SettingsModal from 'flarum/components/SettingsModal';

export default class GithubAutolinkSettingsModal extends SettingsModal {
  className() {
    return 'GithubAutolinkSettingsModal Modal--small';
  }

  title() {
    return app.translator.trans('sijad-github-autolink.admin.settings.title');
  }

  form() {
    return [
      <div className="Form-group">
        <label>{app.translator.trans('sijad-github-autolink.admin.settings.main_repository')}</label>
        <input className="FormControl"
          placeholder={app.translator.trans('sijad-github-autolink.admin.settings.repository_placeholder')}
          bidi={this.setting('sijad-github-autolink.repository')}/>
      </div>,
    ];
  }
}
