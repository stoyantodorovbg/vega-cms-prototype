import { mount } from '@vue/test-utils'
import TextRenderer from "../../js/components/page/containers/TextRenderer";

describe('TextRenderer Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(TextRenderer);

    expect(wrapper).toMatchSnapshot();
  });
});
