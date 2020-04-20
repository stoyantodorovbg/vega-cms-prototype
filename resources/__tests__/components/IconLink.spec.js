import { mount } from '@vue/test-utils'
import IconLink from '../../js/components/links/IconLink'

describe('IconLink Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(IconLink);

    expect(wrapper).toMatchSnapshot()
  });
});
