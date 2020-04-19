import { mount } from '@vue/test-utils'
import Container from "../../js/components/page/containers/Container";

describe('Container Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(Container);

    expect(wrapper).toMatchSnapshot();
  });
});
