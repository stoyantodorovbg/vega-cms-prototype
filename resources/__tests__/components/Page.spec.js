import { mount } from '@vue/test-utils'
import Page from "../../js/components/page/Page";

describe('Page Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(Page);

    expect(wrapper).toMatchSnapshot();
  });
});
