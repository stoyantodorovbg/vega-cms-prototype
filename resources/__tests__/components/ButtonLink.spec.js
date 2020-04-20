import { mount } from '@vue/test-utils'
import ButtonLink from "../../js/components/links/ButtonLink";

describe('ButtonLink Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(ButtonLink);

    expect(wrapper).toMatchSnapshot();
  });
});
