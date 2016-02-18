import app from 'flarum/app';

import GithubSettingsModal from 'sijad/github/autolink/components/GithubAutolinkSettingsModal';

app.initializers.add('sijad-github-autolink', () => {
  app.extensionSettings['sijad-github-autolink'] = () => app.modal.show(new GithubSettingsModal());
});
